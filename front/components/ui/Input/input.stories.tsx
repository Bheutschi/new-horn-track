import type {
    Meta,
    StoryObj
} from 'storybook-react-rsbuild';

import {
    Input
} from './input';

const meta: Meta<typeof Input> = {
    title: 'Components/Input',
    component: Input,
    tags: ['autodocs'],
    parameters: {
        layout: 'centered',
    }
}

export default meta;

type Story = StoryObj<typeof Input>;

export const Primary: Story = {
    args: {
        label: 'Label',
    },
};