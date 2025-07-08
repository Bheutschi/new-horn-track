import { createFileRoute } from '@tanstack/react-router'
import {useQuery} from "@tanstack/react-query";
import {api} from "@/src/api.ts";

export const Route = createFileRoute('/users/')({
  component: RouteComponent,
})

type User = {
    id: number,
    name: string,
    email: string
}

function useUsers(){
    return useQuery({
        queryKey: ['users'],
        queryFn: async () : Promise<Array<User>> => {
            const response = await api.get(
                'users'
            )
            const json  = await response.json()
            return json.data
        },
    })
}


function RouteComponent() {
    const { isPending, error, data } = useUsers()
    console.log(data)
    if (isPending) return 'Loading...'

    if (error) return 'An error has occurred: ' + error.message

    return (
        <div>
            {data.map((user: any) => (
                <div key={user.id} className="p-2">
                    <h3>{user.name}</h3>
                    <p>{user.email}</p>
                </div>
            ))}
        </div>
    )
}
