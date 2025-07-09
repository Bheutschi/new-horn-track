import * as React from 'react';

import {
    Card,
    CardContent
} from '../../ui/Card/card';

import {
    Sidebar,
    SidebarContent, SidebarFooter,
    SidebarGroup,
    SidebarGroupContent,
    SidebarMenu, SidebarMenuButton, SidebarMenuItem,
    SidebarProvider
} from "../../ui/SideBar/sidebar";

import {
    Title
} from "../../ui/Title/title";

import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow
} from "../../ui/Table/table";

import {
    House,
    ArrowLeftRight,
    List,
    LogOutIcon
} from "lucide-react";

import {
    Badge
} from "../../ui/Badge/badge";

export function History() {
    return (
        <div className="flex h-screen w-full text-[#1C2366]">
            <SidebarProvider>
                <Sidebar collapsible="none" side="left" variant="sidebar">
                    <SidebarContent>
                        <SidebarGroup>
                            <Title color="green">
                                Application
                            </Title>
                            <SidebarGroupContent>
                                <SidebarMenu>
                                    {[
                                        ['Home', <House/>],
                                        ['Prêter un PC', <ArrowLeftRight/>],
                                        ['Liste des PCS', <List/>]
                                    ].map(([label, icon]) => (
                                        <SidebarMenuItem key={label as string}>
                                            <SidebarMenuButton>
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
                            {[['Logout', <LogOutIcon/>]].map(([label, icon]) => (
                                <SidebarMenuItem key={label as string}>
                                    <SidebarMenuButton>
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

            {/* Content */}
            <div className="flex flex-1 py-5 px-4 overflow-y-auto gap-20 justify-center items-center">

                {/* Bottom table section */}
                <div className="flex flex-col justify-center items-center gap-20">
                    <Card>
                        <Title>Historique des prêts</Title>
                        <Title size="thirdary">JT-23-09-13</Title>
                        <CardContent>
                            <Table className="w-full">
                                <TableHeader>
                                    <TableRow className="bg-[#f5f5f5] text-sm text-[#1c2366] uppercase">
                                        <TableHead className="w-[150px]">Bénéficiaire</TableHead>
                                        <TableHead>E-Mail du bénéficiaire</TableHead>
                                        <TableHead>Prêteur</TableHead>
                                        <TableHead className="text-right">État de retour</TableHead>
                                        <TableHead className="text-right">Début du prêt</TableHead>
                                        <TableHead className="text-right">Réceptionnaire</TableHead>
                                        <TableHead className="text-right">Retour du prêt</TableHead>
                                    </TableRow>
                                </TableHeader>
                                <TableBody>
                                    <TableRow className="hover:bggray-50 transition">
                                        <TableCell className="font-bold">Soufiane Kefif</TableCell>
                                        <TableCell>soufianeKefif@jobtrek.ch</TableCell>
                                        <TableCell>Sara Nsingui</TableCell>
                                        <TableCell className="text-center">
                                            <Badge variant="default">OK</Badge>
                                        </TableCell>
                                        <TableCell className="text-left">08:50:32 07-07-2025</TableCell>
                                        <TableCell className="text-right">Sara Nsingui</TableCell>
                                        <TableCell className="text-right">15:41:29 07-07-2025</TableCell>
                                    </TableRow>
                                </TableBody>
                            </Table>
                        </CardContent>
                    </Card>
                </div>
            </div>
        </div>
    )
}