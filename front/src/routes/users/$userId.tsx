import {createFileRoute} from '@tanstack/react-router'
import {useQuery} from "@tanstack/react-query";

export const Route = createFileRoute('/users/$userId')({
    component: RouteComponent,
})

function RouteComponent() {
    const {userId} = Route.useParams()
    const {isPending, error, data} = useQuery({
        queryKey: ['users', userId],
        queryFn: async () => {
            const response = await fetch(
                'http://localhost/api/users/' + userId,
            )
            const json = await response.json()
            return json.data
        },
    })

    if (isPending) return 'Loading...'

    if (error) return 'An error has occurred: ' + error.message

    return (
        <div>
            <div key={data.id} className="p-2">
                <h3>{data.name}</h3>
                <p>{data.email}</p>
            </div>
        </div>
    )
}
