import Swal from 'sweetalert2'

export const showNotif = (status, message, position='top-end') => {
  const Toast = Swal.mixin({
    toast: true,
    position: position,
    showConfirmButton: false,
    width: '400px',
    timer: 3000,
    timerProgressBar: true,
    didOpen: toast => {
      toast.onmouseenter = Swal.stopTimer
      toast.onmouseleave = Swal.resumeTimer
    },
  })

  Toast.fire({
    icon: status,
    title: message,
  })
}

export default { showNotif }
