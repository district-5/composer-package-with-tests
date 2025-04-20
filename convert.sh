#!/usr/bin/env bash
#
# District5: Composer library template
# Copyright: District5
#    Author: District5
#      Link: https://www.district5.co.uk
#
# License:
# This software and associated documentation (the "Software") may not be
# used, copied, modified, distributed, published or licensed to any 3rd party
# without the written permission of District5 or its author.
#
# The above copyright notice and this permission notice shall be included in
# all licensed copies of the Software.
#
BASE_NAMESPACE="District5"
ORIGINAL_NAMESPACE="ComposerTemplate"
ORIGINAL_PACKAGE_NAME="composer-package-with-tests"

GREEN="\033[0;32m"
RED="\033[0;31m"
ORANGE="\033[0;33m"
NC="\033[0m"

DIRECTORY=$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )
cd "${DIRECTORY}" || exit 1

echo "What's the base namespace? [Default: District5]"
read -r TMP_BASE_NAMESPACE
if [ -z "${TMP_BASE_NAMESPACE}" ]; then
  TMP_BASE_NAMESPACE="${BASE_NAMESPACE}"
fi
if [[ "${TMP_BASE_NAMESPACE}" =~ ^[[:alnum:]]*$ ]] && [[ ! "${TMP_BASE_NAMESPACE}" =~ ^[[:digit:]]+$ ]] && [[ "${TMP_BASE_NAMESPACE:0:1}" == [A-Z] ]]; then
  BASE_NAMESPACE="${TMP_BASE_NAMESPACE}"
else
  echo -e "\033[0;31m! Namespaces must be alphanumeric and start with a capital letter !\033[0m"
  exit 1
fi

echo ""
echo "----"
echo ""

echo "What is the namespace for the project?"
echo "For example, entering Foo will result in the namespace of ${BASE_NAMESPACE}\Foo"
read -r NAMESPACE_NAME
if [ -z "${NAMESPACE_NAME}" ]; then
  echo "Providing a namespace is required"
  exit 1
fi

if [[ "${NAMESPACE_NAME}" =~ ^[[:alnum:]]*$ ]] && [[ ! "${NAMESPACE_NAME}" =~ ^[[:digit:]]+$ ]] && [[ "${NAMESPACE_NAME:0:1}" == [A-Z] ]]; then
  echo "  - Complete NS: ${BASE_NAMESPACE}\\${NAMESPACE_NAME}"
else
  echo -e "\033[0;31m! Namespace must be alphanumeric and start with a capital letter !\033[0m"
  exit 1
fi

echo ""
echo "----"
echo ""

NAMESPACE_NAME_LOWER=$(echo "${NAMESPACE_NAME}" | sed 's/\([A-Z]\)/-\1/g' | awk '{print tolower($0)}')
NAMESPACE_NAME_LOWER=${NAMESPACE_NAME_LOWER:1}

echo -e "${GREEN}The composer package will be renamed to:${NC}"
echo -e "${GREEN}  district5/${NAMESPACE_NAME_LOWER}${NC}"

FULL_NEW_NAMESPACE="\\${BASE_NAMESPACE}\\${NAMESPACE_NAME}"
echo -e "${GREEN}Full new namespace: ${FULL_NEW_NAMESPACE}${NC}"

if [[ "${1}" != '-y' ]] && [[ "${2}" != '-y' ]]; then
  echo ""
  echo "Sleeping for 4 seconds..."
  sleep 4
fi

if [ -d "${DIRECTORY}/build" ]; then
  echo "Deleting build directory..."
  rm -rf "${DIRECTORY}/build"
fi

# iterate over all files of all types and echo the file name
# shellcheck disable=SC2044
for file in $(find "${DIRECTORY}" -type f); do
  # if filename ends in sh, continue
  if [[ "${file}" == *".sh" || "${file}" == *"coverage.xml" || "${file}" == *"junit.xml" || "${file}" == *".gitignore" || "${file}" == *"composer.lock" || "${file}" == *"pull_request_template.md" ]]; then
    continue
  fi
  # if filename contains /vendor/ or /.idea continue
  if [[ "${file}" == *"/vendor/"* || "${file}" == *"/.idea/"* || "${file}" == *"/.git/"* || "${file}" == *"/build/"* || "${file}" == *"/ISSUE_TEMPLATE/"* ]]; then
    continue
  fi
  echo "Processing file: ${file}"
  # Replace the namespace in the file
  sed -i '' -e "s|@package District5|@package ${BASE_NAMESPACE}|g" "${file}"
  sed -i '' -e "s|namespace District5|namespace ${BASE_NAMESPACE}|g" "${file}"
  sed -i '' -e "s|use District5|use ${BASE_NAMESPACE}|g" "${file}"
  sed -i '' -e "s|\"psr-4\": { \"District5|\"psr-4\": { \"${BASE_NAMESPACE}|g" "${file}"
  sed -i '' -e "s|${ORIGINAL_NAMESPACE}|${NAMESPACE_NAME}|g" "${file}"
  sed -i '' -e "s|${ORIGINAL_PACKAGE_NAME}|${NAMESPACE_NAME_LOWER}|g" "${file}"
  sed -i '' -e "s|A boilerplate library template.|${NAMESPACE_NAME} library|g" "${file}"
  sed -i '' -e "s|Composer library|${NAMESPACE_NAME}|g" "${file}"
  sed -i '' -e "s|2025|$(date +%Y)|g" "${file}"
done

NEW_README=$(cat <<-EOM
${BASE_NAMESPACE}\\${NAMESPACE_NAME} library
====

### Install with composer...

\`\`\`
composer require district5/${NAMESPACE_NAME_LOWER} dev-master
\`\`\`

### Installing as a private repository...

\`\`\`
"repositories":[
    {
        "type": "vcs",
        "url": "git@github.com:district-5/${NAMESPACE_NAME_LOWER}.git"
    }
],

"require": {
    "district5/${NAMESPACE_NAME_LOWER}": "dev-master"
}
\`\`\`

### Testing...

\`\`\`
composer install
./vendor/bin/phpunit
\`\`\`
EOM
)
echo "${NEW_README}" > README.md

echo ""
echo "----"
echo ""

composer update --quiet

USE_CODECOV="y"
echo "Do you want to add the steps to use Codecov? y/n [Default: 'y']"
read -r USE_CODECOV_FLAG
if [ "${USE_CODECOV_FLAG}" == "n" ]; then
  USE_CODECOV="n"
fi

rm -f "${DIRECTORY}/.github/workflows/ci.yml"
if [ "${USE_CODECOV}" == "y" ]; then
  mv "${DIRECTORY}/.github/ci-with-codecov.yml" "${DIRECTORY}/.github/workflows/ci.yml"
  rm -f "${DIRECTORY}/.github/ci-without-codecov.yml"
else
  mv "${DIRECTORY}/.github/ci-without-codecov.yml" "${DIRECTORY}/.github/workflows/ci.yml"
  rm -f "${DIRECTORY}/.github/ci-with-codecov.yml"
fi

git remote set-url origin "git@github.com:district-5/${NAMESPACE_NAME_LOWER}.git"

echo ""
if [ -f "./vendor/bin/phpunit" ]; then
  echo "Running test suite..."
  ./vendor/bin/phpunit
  echo -e "${GREEN}Test suite has been executed${NC}"
fi

echo ""
echo "New repository created, and pushed to new origin."
echo "----"
echo ""
echo "  - Next steps:"
echo -e "    1: ${RED}Create district-5/${NAMESPACE_NAME_LOWER} repository${NC}"
echo -e "    2: ${RED}Add the 'CODECOV_TOKEN' variable into the target repository secrets${NC}"
echo -e "    3: ${RED}https://github.com/district-5/${NAMESPACE_NAME_LOWER}/settings/secrets/actions/new${NC}"
echo ""
echo "  - If you want to revert the changes, run the following block:"
echo -e "${ORANGE}git remote set-url origin git@github.com:district-5/composer-package-with-tests.git && git reset HEAD . && git checkout . && composer update && ./vendor/bin/phpunit${NC}"
echo ""
