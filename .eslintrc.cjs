const isDev = process.env.NODE_ENV === `development`
module.exports = {
  root: true,
  env: { browser: true, es2020: true },
  extends: [
    'eslint:recommended',
    'plugin:react/recommended',
    'plugin:react/jsx-runtime',
    'plugin:react-hooks/recommended',
    'plugin:prettier/recommended'
  ],
  ignorePatterns: ['dist', '.eslintrc.cjs'],
  parserOptions: { ecmaVersion: 'latest', sourceType: 'module' },
  settings: { react: { version: '18.2' } },
  plugins: ['react-refresh'],
  rules: {
    'react-hooks/exhaustive-deps': `off`,
    'react/prop-types': `off`,
    'object-curly-newline': `off`,
    semi: [`error`, `never`],
    'max-len': [
      `error`,
      100,
      2,
      {
        ignoreUrls: true,
        ignoreRegExpLiterals: true,
        ignoreTemplateLiterals: true,
      },
    ],
    'no-console': `warn`,
    radix: 1,
    'prefer-destructuring': `off`,
    'no-useless-concat': `error`,
    'no-negated-condition': 0,
    quotes: [`error`, `backtick`],
    'no-multi-spaces': 2,
    'no-multiple-empty-lines': [
      `error`,
      {
        max: 1,
        maxEOF: 1,
      },
    ],
    'no-irregular-whitespace': 2,
    camelcase: [
      2,
      {
        properties: `always`,
      },
    ],
    'no-trailing-spaces': [
      2,
      {
        skipBlankLines: true,
      },
    ],
    'prettier/prettier': [`warn`],
    'no-unused-vars': [
      isDev ? `warn` : `error`,
      {
        ignoreRestSiblings: true,
        varsIgnorePattern: `^_`,
        argsIgnorePattern: `^_`,
      },
    ],
    'no-debugger': isDev ? `warn` : `error`,
    'no-nested-ternary': `error`,
  },
}
