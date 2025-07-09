import {
    Meta,
    StoryObj
} from "storybook-react-rsbuild";

import {
    Connexion
} from "./connect";

const meta: Meta<typeof Connexion> = {
    title: "pages/Connexion",
    component: Connexion,
    parameters: {
        layout: "fullscreen",
    },
}

export default meta;

type Story = StoryObj<typeof Connexion>

export const Default: Story = {
    render: () => <Connexion/>
}