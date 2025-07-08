import type {
  Meta,
  StoryObj
} from '@storybook/react-vite';

import {
  Title
} from './title';

const meta: Meta<typeof Title> = {
  title: 'Components/Title',
  component: Title,
  tags: ['autodocs'],
  parameters: {
    layout: 'centered',
  },
};

export default meta;

type Story = StoryObj<typeof Title>;

export const Primary: Story = {
  args: {
    children: 'Title',
    size: 'default',
    color: 'blue'
  },
};

export const Secondary: Story = {
  args: {
    children: 'Title',
    color: 'green'
  }
}

export const Tertiary: Story = {
  args: {
    children: 'Title',
    size: 'secondary',
    color: 'green'
  }
}

export const Fourth: Story = {
  args: {
    children: 'Title',
    size: 'thirdary',
    color: 'green'
  }
}