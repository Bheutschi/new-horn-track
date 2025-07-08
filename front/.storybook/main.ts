import { StorybookConfig } from 'storybook-react-rsbuild'

const config: StorybookConfig = {
  rsbuildFinal: (config) => {
    return config
  },
  "stories": [
    "../src/**/*.mdx",
    "../components/**/*.stories.@(js|jsx|mjs|ts|tsx)"
  ],
  "addons": [
    '@storybook/addon-onboarding',
    '@storybook/addon-links',
    '@storybook/addon-essentials',
    '@storybook/addon-docs',
    '@storybook/addon-interactions',
  ],
  "framework": {
    "name": 'storybook-react-rsbuild',
    "options": {}
  }
};

export default config;