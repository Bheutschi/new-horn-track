import { createFileRoute } from '@tanstack/react-router'
import {useQuery} from "@tanstack/react-query";

export const Route = createFileRoute('/about')({
    component: About,
})

function About() {
    
}