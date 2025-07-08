import ky from 'ky'

const baseUrl = import.meta.env.PUBLIC_APP_URL

export const api = ky.create({
  prefixUrl: baseUrl,
  headers: {
    'Content-Type': 'application/json',
  },
  timeout: 10000,
})