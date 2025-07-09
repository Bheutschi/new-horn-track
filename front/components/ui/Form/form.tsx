import {
    Card,
    CardContent
} from "../Card/card";

import {
    Input,
    InputProps
} from "../Input/input";

import {
    Button
} from "../Button/button";

import {
    Title
} from "../Title/title";

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