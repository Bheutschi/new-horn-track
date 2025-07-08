import type {
    Meta,
    StoryObj
} from 'storybook-react-rsbuild';

import {
    Button
} from './button';

const meta: Meta<typeof Button> = {
    title: 'Components/Button',
    component: Button,
    tags: ['autodocs'],
    parameters: {
        layout: 'centered',
    },
    argTypes: {
        variant: {
            options: ['primary', 'secondary'],
            control: {type: 'radio'},
        },
        size: {
            options: ['default', 'sm'],
            control: {type: 'radio'},
        }
    }
}

export default meta;

type Story = StoryObj<typeof Button>;

export const Primary: Story = {
    args: {
        variant: 'primary',
        size: 'default',
        children: 'Primary button',
    },
};


export const Secondary: Story = {
    args: {
        variant: 'secondary',
        children: 'Secondary button',
    }
}

export const Small: Story = {
    args: {
        variant: 'primary',
        size: 'sm',
        children: 'Small button',
    }
}