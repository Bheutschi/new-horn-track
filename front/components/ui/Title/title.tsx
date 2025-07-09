import * as React from "react";

import {
    cva,
    VariantProps
} from "class-variance-authority";

import {
    cn
} from "@/lib/utils";

export const titleVariants = cva(
    "flex font-display-title uppercase font-medium justify-left p-[10px] w-fit",
    {
        variants: {
            size: {
                default:
                    "text-[1.7em]",
                secondary:
                    "text-[1.3em]",
                thirdary:
                    "text-[1em] font-bold"
            },
            color: {
                green:
                    "text-[#AACA36]",
                blue:
                    "text-[#1C2366]",
            },
            margin: {
                default:
                    "m-0",
                sm:
                    "mt-[-62px] ml-[-300px] px-10",
            }
        },
        defaultVariants: {
            size: "default",
            color: 'blue',
            margin: 'default'
        },
    }
)

function Title({
                   className,
                   size,
                   color,
    margin,
                   ...props
               }: React.ComponentProps<"div"> & VariantProps<typeof titleVariants>) {
    return (
        <div
            data-slot="card-title"
            className={cn(titleVariants({className, size, color, margin}))}
            {...props}
        />
    )
}

export {Title}