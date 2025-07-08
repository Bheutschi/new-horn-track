import type {
    Meta,
    StoryObj
} from 'storybook-react-rsbuild';

import Form from './form';

const meta: Meta<typeof Form> = {
    title: 'Components/Form',
    component: Form,
    tags: ['autodocs'],
    parameters: {
        layout: 'centered',
    }
}

export default meta;

type Story = StoryObj<typeof Form>;

export const Primary: Story = {
    args: {

    }
}