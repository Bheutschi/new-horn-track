import type {
    Meta,
    StoryObj
} from "storybook-react-rsbuild";

import {
    Dashboard
} from "./dashboard";

const meta: Meta<typeof Dashboard> = {
    title: "pages/Dashboard",
    component: Dashboard,
    parameters: {
        layout: "fullscreen",
    },
}

export default meta;

type Story = StoryObj<typeof Dashboard>

export const Default: Story = {
    render: () => <Dashboard/>
}