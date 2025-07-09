import type {
    Meta,
    StoryObj
} from '@/storybook/react-vite';

import {
    Table,
    TableHeader,
    TableBody,
    TableHead,
    TableRow,
    TableCell
} from './table';

import {
    Badge
} from "../Badge/badge";

const meta: Meta<typeof Table> = {
    title: 'Components/Table',
    component: Table,
    tags: ['autodocs'],
    parameters: {
        layout: 'centered',
    }
}

export default meta;

type Story = StoryObj<typeof Table>;

export const Primary: Story = {
    render: args =>
        (
            <Table {...args}>
                <TableHeader>
                    <TableRow>
                        <TableHead className="w-[100px]">Numéro</TableHead>
                        <TableHead>Marque</TableHead>
                        <TableHead>Bénéficiaire</TableHead>
                        <TableHead className="text-right">Prêter par</TableHead>
                        <TableHead className="text-right">Heure de prêt</TableHead>
                    </TableRow>
                </TableHeader>
                <TableBody>
                    <TableRow>
                        <TableCell className="font-bold">JT-23-09-12</TableCell>
                        <TableCell>HP</TableCell>
                        <TableCell>Nom Prénom</TableCell>
                        <TableCell className="text-right">Nom Prénom</TableCell>
                        <TableCell className="text-right">08:13:41 01-07-2025</TableCell>
                        <TableCell className="text-right">détails</TableCell>
                    </TableRow>
                </TableBody>
            </Table>
        )
};

export const Secondary: Story = {
    render: args =>
        (
            <Table {...args}>
                <TableHeader>
                    <TableRow>
                        <TableHead className="w-[100px]">Numéro</TableHead>
                        <TableHead>Marque</TableHead>
                        <TableHead>Modèle</TableHead>
                        <TableHead className="text-right">État du dernier retour</TableHead>
                    </TableRow>
                </TableHeader>
                <TableBody>
                    <TableRow>
                        <TableCell className="font-bold">JT-23-09-13</TableCell>
                        <TableCell>HP</TableCell>
                        <TableCell>EliteBook 845 G9</TableCell>
                        <TableCell className="text-right">Parfait</TableCell>
                        <TableCell className="text-right">détails</TableCell>
                    </TableRow>
                </TableBody>
            </Table>
        )
}

export const Tertiary: Story = {
    render: args =>
        (
            <Table {...args}>
                <TableHeader>
                    <TableRow>
                        <TableHead className="w-[100px]">Numéro</TableHead>
                        <TableHead>Marque</TableHead>
                        <TableHead>Modèle</TableHead>
                        <TableHead className="text-right">Disponibilité</TableHead>
                    </TableRow>
                </TableHeader>
                <TableBody>
                    <TableRow>
                        <TableCell className="font-bold">JT-23-09-13</TableCell>
                        <TableCell>HP</TableCell>
                        <TableCell>EliteBook 845 G9</TableCell>
                        <TableCell className="text-right">
                            <Badge variant={'default'}>OK</Badge>
                        </TableCell>
                        <TableCell className="text-right">détails</TableCell>
                    </TableRow>
                </TableBody>
            </Table>
        )
}