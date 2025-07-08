import {
    Card,
    CardContent
} from '../../ui/Card/card';

import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarGroup,
    SidebarGroupContent,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
    SidebarProvider
} from "../../ui/SideBar/sidebar";

import {
    Title
} from "../../ui/Title/title";

import {
    House,
    ArrowLeftRight,
    List,
    LogOutIcon
} from "lucide-react";

import {
    Input
} from '../../ui/Input/input';

import {
    Button
} from "../../ui/Button/button";

export function Pret() {
    return (
        /* 🧱 Full page */
        <div className="flex h-screen w-full text-[#1C2366]">

            {/* 🧭 Sidebar */}
            <SidebarProvider>
                <Sidebar collapsible="none" side="left" variant="sidebar">
                    <SidebarContent>
                        <SidebarGroup>
                            <Title color="green" variant="secondary">
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
                                <SidebarMenuItem key={label}>
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

            {/* 📊 Content */}
            <div className="flex flex-col flex-1 w-full py-5 px-4 overflow-y-auto gap-10 justify-center items-center">
                <Title>Prêter un ordinateur</Title>
                <div className="flex flex-col items-center justify-center w-fit">
                    <Card>
                        <CardContent>
                            <Input label="UUID"/>
                            <div className="flex flex-row gap-6 items-center justify-center w-full">
                                <hr className="w-1/5 border-[#1C2366] h-0.5 border"/>
                                <p>ou</p>
                                <hr className="w-1/5 border-[#1C2366] h-0.5 border"/>
                            </div>

                            <Input label="Nom de l'ordinateur"/>
                            <Button size="sm" variant="primary">Prêt</Button>
                        </CardContent>
                    </Card>
                </div>
            </div>
        </div>
    )
}