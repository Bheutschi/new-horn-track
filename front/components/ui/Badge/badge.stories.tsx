import type {
    Meta,
    StoryObj
} from 'storybook-react-rsbuild';

import {
    Badge,
} from './badge';

const meta: Meta<typeof Badge> = {
    title: 'Components/Badge',
    component: Badge,
    tags: ['autodocs'],
    parameters: {
        layout: 'centered',
    }
}

export default meta;

type Story = StoryObj<typeof Badge>;

export const Primary: Story = {
    args: {
        variant: 'default',
        children: 'Default badge',
    },
};

export const Secondary: Story = {
    args: {
        variant: 'secondary',
        children: 'Secondary badge',
    },
}

export const Tertiary: Story = {
    args: {
        variant: 'tertiary',
        children: 'Tertiary badge',
    },
}