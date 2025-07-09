import type {
    Meta,
    StoryObj
} from 'storybook-react-rsbuild';

import {
    ArrowLeftRight,
    List,
    LogOutIcon,
    House
} from "lucide-react"

import {
    Title
} from "../Title/title";

import {
    Sidebar,
    SidebarContent, SidebarFooter,
    SidebarGroup,
    SidebarGroupContent,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
    SidebarProvider
} from "./sidebar";

const meta: Meta<typeof Sidebar> = {
    title: 'Components/Sidebar',
    component: Sidebar,
    tags: ['autodocs'],
}

export default meta;

type Story = StoryObj<typeof Sidebar>;

export const Primary: Story = {
    args: {
        side: "left",
        variant: "sidebar",
        collapsible: "none"
    },

    render: (args) => (
        <SidebarProvider>
            <Sidebar collapsible="none" side="left" variant="sidebar">
                <SidebarContent>
                    <SidebarGroup>
                        <Title color="green">
                            Application
                        </Title>
                        <SidebarGroupContent>
                            <SidebarMenu>
                                {[["Home", <House/>], ["Prêter un PC", <ArrowLeftRight/>], ["Liste des PCS",
                                    <List/>]]
                                    .map(([label, icon]) => (
                                        <SidebarMenuItem key={label as string}>
                                            <SidebarMenuButton asChild>
                                                <a href="#" className="flex items-center gap-2">
                                                    {icon}
                                                    <span>{label}</span>
                                                </a>
                                            </SidebarMenuButton>
                                        </SidebarMenuItem>
                                    ))}
                            </SidebarMenu>
                        </SidebarGroupContent>
                    </SidebarGroup>
                </SidebarContent>
                <SidebarFooter>
                    <SidebarMenu>
                        {[["Logout", <LogOutIcon/>]].map(([label, icon]) => (
                            <SidebarMenuItem key={label as string}>
                                <SidebarMenuButton asChild>
                                    <a href="#" className="flex items-center gap-2">
                                        {icon}
                                        <span>{label}</span>
                                    </a>
                                </SidebarMenuButton>
                            </SidebarMenuItem>
                        ))}
                    </SidebarMenu>
                </SidebarFooter>
            </Sidebar>
        </SidebarProvider>
    )
}