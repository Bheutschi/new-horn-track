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
    ChartConfig,
    ChartPie
} from "../../ui/Pie Chart/pie-chart";

import {
    House,
    ArrowLeftRight,
    List,
    LogOutIcon
} from "lucide-react";

const chartData = [
    {
        browser: "disponible",
        ordinateurs: 17
    },
    {
        browser: "preter",
        ordinateurs: 5
    },
    {
        browser: "reparer",
        ordinateurs: 2
    },
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
    }
} satisfies ChartConfig


export function Dashboard() {
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
            <div className="flex flex-col flex-1 py-5 px-4 overflow-y-auto gap-20">

                {/* 📈 Top cards section */}
                <div className="flex justify-center items-center gap-10">
                    {/* 🟦 Card 1 - Graphique */}
                    <Card
                        className="h-[300px] w-[400px]">
                        <Title size="secondary" margin="default">PC</Title>
                        <div className="w-[180px] h-[180px]">
                            <ChartPie data={chartData} config={chartConfig}/>
                        </div>
                    </Card>

                    {/* 🟩 Card 2 - Disponibles */}
                    <Card
                        className="h-[250px] w-[400px]">
                        <Title size="secondary" margin="default" className="text-[#AACA36]">PC disponible</Title>
                        <h1 className="text-5xl font-bold text-[#AACA36]">13</h1>
                    </Card>

                    {/* 🟨 Card 3 - En prêt */}
                    <Card
                        className="h-[250px] w-[400px]">
                        <Title size="secondary" margin="default">PC en prêt</Title>
                        <h1 className="text-5xl font-bold text-[#1C2366]">4</h1>
                    </Card>
                </div>

                {/* 📋 Bottom table section */}
                <div className="flex flex-col justify-center items-center gap-20">
                    <Card>
                        <Title>PC en cours de prêt</Title>
                        <CardContent>
                            <Table className="w-full">
                                <TableHeader>
                                    <TableRow className="bg-[#f5f5f5] text-sm text-[#1C2366] uppercase">
                                        <TableHead className="w-[150px]">Numéro</TableHead>
                                        <TableHead>Marque</TableHead>
                                        <TableHead>Bénéficiaire</TableHead>
                                        <TableHead className="text-right">Prêter par</TableHead>
                                        <TableHead className="text-right">Heure de prêt</TableHead>
                                        <TableHead className="text-right">Détails</TableHead>
                                    </TableRow>
                                </TableHeader>
                                <TableBody>
                                    <TableRow className="hover:bg-gray-50 transition">
                                        <TableCell className="font-bold">JT-23-09-12</TableCell>
                                        <TableCell>HP</TableCell>
                                        <TableCell>Soufiane Kefif</TableCell>
                                        <TableCell className="text-right">Semhar Ghirmay</TableCell>
                                        <TableCell className="text-right">08:13:41 01-07-2025</TableCell>
                                        <TableCell
                                            className="text-right text-blue-600 underline cursor-pointer">détails</TableCell>
                                    </TableRow>
                                </TableBody>
                            </Table>
                        </CardContent>

                    </Card>

                    <Card>
                        <Title>PC disponibles</Title>
                        <CardContent>
                            <Table className="w-full">
                                <TableHeader>
                                    <TableRow className="bg-[#f5f5f5] text-sm text-[#1C2366] uppercase">
                                        <TableHead className="w-[150px]">Numéro</TableHead>
                                        <TableHead>Marque</TableHead>
                                        <TableHead>Modèle</TableHead>
                                        <TableHead className="text-right">État du dernier retour</TableHead>
                                        <TableHead className="text-right">Détails</TableHead>
                                    </TableRow>
                                </TableHeader>
                                <TableBody>
                                    <TableRow className="hover:bg-gray-50 transition">
                                        <TableCell className="font-bold">JT-23-09-13</TableCell>
                                        <TableCell>HP</TableCell>
                                        <TableCell>EliteBook 845 G9</TableCell>
                                        <TableCell className="text-right">Parfait</TableCell>
                                        <TableCell
                                            className="text-right text-blue-600 underline cursor-pointer">détails</TableCell>
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