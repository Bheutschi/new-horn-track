import {
    Card,
    CardContent
} from "@/components/ui/Card/card";

import {
    Input,
    InputProps
} from "@/components/ui/Input/input";

import {
    Button
} from "@/components/ui/Button/button";

import {
    Title
} from "@/components/ui/Title/title";

interface FormProps {
    inputProps: InputProps;
}

function Form({inputProps}: FormProps) {
    return (
        <Card>
            <Title>Titre</Title>
            <CardContent>
                <Input {...inputProps}/>
                <Button>Submit</Button>
            </CardContent>
        </Card>
    )
}

export default Form;