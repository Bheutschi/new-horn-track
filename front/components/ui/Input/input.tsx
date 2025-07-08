import * as React from "react";
import {
    cn
} from "@/lib/utils";

export interface InputProps extends React.InputHTMLAttributes<HTMLInputElement> {
  label: string;
}

export function Input({ label, className, ...props }: InputProps) {
  const inputId = React.useId();

  return (
    <div className="relative w-[300px] h-[70px] overflow-hidden">
      <input
        id={inputId}
        required
        className={cn(
          "peer w-full h-full pt-5 text-[15px] text-[#1C2366] border-b border-[#AACA36] bg-transparent focus:outline-none",
          className
        )}
        {...props}
      />

      <label
        htmlFor={inputId}
        className="absolute left-0 bottom-0 pb-[5px] text-[#1C2366] text-[15px] transition-all duration-300 peer-placeholder-shown:translate-y-0 peer-focus:translate-y-[-150%] peer-valid:translate-y-[-150%] peer-focus:text-[17px] peer-valid:text-[17px]"
      >
        <span className="block transition-all duration-300">
          {label}
        </span>
        <span className="absolute bottom-[-1px] left-0 w-full h-full border-b-[3px] border-[#1C2366] transform -translate-x-full transition-transform duration-300 peer-focus:translate-x-0 peer-valid:translate-x-0" />
      </label>
    </div>
  );
}