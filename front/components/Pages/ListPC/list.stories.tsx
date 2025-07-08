import type {
    Meta,
    StoryObj
} from "storybook-react-rsbuild";

import {
    ListPC
} from "./list";

const meta: Meta<typeof ListPC> = {
    title: "Pages/Liste des PC",
    component: ListPC,
    parameters: {
        layout: "fullscreen",
    },
}

export default meta;

type Story = StoryObj<typeof ListPC>

export const Default: Story = {
    render: () => <ListPC/>
}