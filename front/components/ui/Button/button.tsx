import * as React from "react"

import {
    Slot
} from "@radix-ui/react-slot"

import {
    cva,
    type VariantProps
} from "class-variance-authority"

import {
    cn
} from "@/lib/utils"

const buttonVariants = cva(
    "inline-flex items-center justify-center py-[1em] px-[3em] font-bold leading-[1em] letter-spacing-fluid uppercase font-display-content",
    {
        variants: {
            variant: {
                primary:
                    "bg-[#AACA36] text-[#1C2366] border-2 hover:bg-transparent hover:text-[#1C2366] hover:border-[#AACA36]",
                secondary:
                    "bg-white text-[#AACA36] border-2 hover:bg-transparent hover:text-[#1C2366]",
            },
            size: {
                default:
                    "text-[1em] w-fit",
                sm:
                    "text-[0.7em] w-fit",
            },
        },
        defaultVariants: {
            variant: "primary",
            size: "default",
        },
    }
)

function Button({
                    className,
                    variant,
                    size,
                    asChild = false,
                    ...props
                }: React.ComponentProps<"button"> &
    VariantProps<typeof buttonVariants> & {
    asChild?: boolean
}) {
    const Comp = asChild ? Slot : "button"

    return (
        <Comp
            data-slot="button"
            className={cn(buttonVariants({variant, size, className}))}
            {...props}
        />
    )
}

export {Button, buttonVariants}