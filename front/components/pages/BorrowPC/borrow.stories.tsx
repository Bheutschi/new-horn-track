import type {
    Meta,
    StoryObj
} from "storybook-react-rsbuild";

import {
    Pret
} from "./borrow-pc";

const meta: Meta<typeof Pret> = {
    title: "pages/Prêt de PC",
    component: Pret,
    parameters: {
        layout: "fullscreen",
    },
}

export default meta;

type Story = StoryObj<typeof Pret>

export const Default: Story = {
    render: () => <Pret/>
}