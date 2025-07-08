import type {
    Meta,
    StoryObj
} from 'storybook-react-rsbuild';

import {
    Card,
    CardContent
} from './card';

const meta: Meta<typeof Card> = {
    title: 'Components/Card',
    component: Card,
    tags: ['autodocs'],
    parameters: {
        layout: 'centered',
    }
}

export default meta;

type Story = StoryObj<typeof Card>;

export const Primary: Story = {
    render: args => (
        <Card {...args}>
            <CardContent>Salut</CardContent>
        </Card>
    )
};