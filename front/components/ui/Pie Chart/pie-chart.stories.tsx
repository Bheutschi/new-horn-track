import type {
    Meta,
    StoryObj
} from 'storybook-react-rsbuild'

import {
    ChartPie,
    ChartConfig
} from "./pie-chart"

const chartData = [
    {browser: "disponible", ordinateurs: 13},
    {browser: "preter", ordinateurs: 4},
    {browser: "reparer", ordinateurs: 2},
]

const chartConfig: ChartConfig = {
    ordinateurs: {
        label: "Visitors",
    },
    disponible: {
        label: "PC disponible",
        color: "#1C2366",
    },
    preter: {
        label: "PCs en cours de prêt",
        color: "#AACA36",
    },
    reparer: {
        label: "PCs en réparation",
        color: "#58691b",
    },
} satisfies ChartConfig

const meta: Meta<typeof ChartPie> = {
    title: "Components/PieChart",
    component: ChartPie,
    tags: ["autodocs"],
    parameters: {
        layout: "centered",
    },
}

export default meta

type Story = StoryObj<typeof ChartPie>


export const Primary: Story = {
    render: () => (
        <div className="w-[300px] h-[300px]">
            <ChartPie data={chartData} config={chartConfig}/>
        </div>
    ),
}