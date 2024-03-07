export const saveClientEvent = (data=null) => {
  window.localStorage.setItem('data-event', JSON.stringify(data))
}

export const getClientEvent = () => {
  return JSON.parse(window.localStorage.getItem('data-event'))
}

export const destroyClientEvent = () => {
  window.localStorage.removeItem('data-event')
}

export default { saveClientEvent, getClientEvent, destroyClientEvent }
