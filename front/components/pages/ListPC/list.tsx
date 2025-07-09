import * as React from 'react';

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
    House,
    ArrowLeftRight,
    List,
    LogOutIcon
} from "lucide-react";

import {
    Button
} from "../../ui/Button/button";

import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow
} from "../../ui/Table/table";

import {
    Badge
} from "../../ui/Badge/badge";

import {
    Card,
    CardContent
} from "../../ui/Card/card";

export function ListPC() {
    return (
        /* 🧱 Full page */
        <div className="flex flex-row text-[#1C2366] h-full">

            {/* 🧭 Sidebar */}
            <SidebarProvider>
                <Sidebar collapsible="none" side="left" variant="sidebar">
                    <SidebarContent>
                        <SidebarGroup>
                            <Title color="green">HornTrack</Title>
                            <SidebarGroupContent>
                                <SidebarMenu>
                                    {[
                                        ["Home", <House/>],
                                        ["Prêter un PC", <ArrowLeftRight/>],
                                        ["Liste des PCS", <List/>]
                                    ].map(([label, icon]) => (
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
                            {[
                                ["Logout", <LogOutIcon/>]
                            ].map(([label, icon]) => (
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
            <div className="flex flex-col flex-1 py-5 px-4 overflow-y-auto gap-10 justify-center items-center">
                <Card>
                    <Title>Liste des PC</Title>
                    <CardContent>
                        <Table className="w-full">
                            <TableHeader>
                                <TableRow className="bg-[#f5f5f5] text-sm text-[#1C2366] uppercase">
                                    <TableHead className="w-[150px]">Numéro</TableHead>
                                    <TableHead>Marque</TableHead>
                                    <TableHead>Modèle</TableHead>
                                    <TableHead className="text-right">Disponibilité</TableHead>
                                    <TableHead className="text-right">Détails</TableHead>
                                </TableRow>
                            </TableHeader>
                            <TableBody>
                                <TableRow className="hover:bg-gray-50 transition">
                                    <TableCell className="font-bold">JT-23-09-13</TableCell>
                                    <TableCell>HP</TableCell>
                                    <TableCell>EliteBook 845 G9</TableCell>
                                    <TableCell className="text-right">
                                        <Badge variant="default">OK</Badge>
                                    </TableCell>
                                    <TableCell className="text-right text-blue-500 underline font-semibold">
                                        <a href="#">détails</a>
                                    </TableCell>
                                </TableRow>
                            </TableBody>
                        </Table>
                    </CardContent>
                </Card>

                <Button variant="primary" size="sm">Ajouter un PC</Button>
            </div>
        </div>
    )
}