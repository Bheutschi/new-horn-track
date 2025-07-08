import * as React from "react"

import {
    cn
} from "../../../lib/utils"

import {
    cva
} from "class-variance-authority";

export const titleVariants = cva(
    "font-display-title uppercase font-medium justify-left p-[10px] w-fit bg-white",
    {
        variants: {
            variant: {
                default:
                    "text-[1.7em]",
                secondary:
                    "text-[1.3em]"
            },
            color: {
                green:
                    "text-[#AACA36]",
                blue:
                    "text-[#1C2366]",
            }
        },
        defaultVariants: {
            variant: "default",
            color: 'blue'
        },
    }
)

function Card({className, ...props}: React.ComponentProps<"div">) {
    return (
        <div
            data-slot="card"
            className={cn(
                "border-2 border-[#F5F5F5] gap-6 h-fit w-fit  shadow-md flex flex-col items-center justify-center p-10",
                className
            )}
            {...props}
        />
    )
}


function CardContent({className, ...props}: React.ComponentProps<"div">) {
    return (
        <div
            data-slot="card-content"
            className={cn(
                "flex flex-col items-center justify-center w-full h-full gap-6",
                className
            )}
            {...props}
        />
    )
}

export {
    Card,
    CardContent,
}
