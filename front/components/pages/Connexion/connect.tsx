import * as React from 'react';

import {
    Card,
    CardContent
} from "../../ui/Card/card";

import {
    Title
} from "../../ui/Title/title";

import {
    Button
} from "../../ui/Button/button";

export function Connexion() {
    return (
        /* Full page */
        <div className="flex flex-col h-screen w-full justify-center items-center text-[#1C2366]">
            <Title size="thirdary" color="blue">Se connecter</Title>
            <Card>
                <CardContent>
                    <Button variant="secondary" size="sm">Se connecter avec Microsoft</Button>
                </CardContent>
            </Card>
        </div>
    )
}