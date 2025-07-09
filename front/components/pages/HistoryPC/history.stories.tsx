import type {
    Meta,
    StoryObj
} from 'storybook-react-rsbuild';

import {History} from './history';

const meta: Meta<typeof History> = {
    title: 'pages/Historique des prêts',
    component: History,
    parameters: {
        layout: 'fullscreen',
    },
}

export default meta;

type Story = StoryObj<typeof History>

export const Default: Story = {
    render: () => <History/>
}