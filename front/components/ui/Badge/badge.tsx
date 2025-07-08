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

const badgeVariants = cva(
    "font-display-content py-[0.3em] px-[0.7em] rounded-[0.2em]",
    {
        variants: {
            variant: {
                default:
                    "text-[#008604FF] bg-[#00FF0566] border border-[#008604FF]",
                secondary:
                    "text-[#888500FF] bg-[#FFFB0066] border border-[#888500FF]",
                tertiary:
                    "text-[#890000FF] bg-[#FF000066] border border-[#890000FF]"
            },
        },
        defaultVariants: {
            variant: "default",
        },
    }
)

function Badge({
                   className,
                   variant,
                   asChild = false,
                   ...props
               }: React.ComponentProps<"span"> &
    VariantProps<typeof badgeVariants> & { asChild?: boolean }) {
    const Comp = asChild ? Slot : "span"

    return (
        <Comp
            data-slot="badge"
            className={cn(badgeVariants({variant}), className)}
            {...props}
        />
    )
}

export {Badge, badgeVariants}
