import { createFileRoute } from '@tanstack/react-router'

export const Route = createFileRoute('/oui')({
  component: RouteComponent,
})

function RouteComponent() {
  return <div>Hello "/test"!</div>
}
