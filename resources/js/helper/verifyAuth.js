import ApiService from "@/services/ApiService"
import JwtService from "@/services/JwtService"
import UserService from "@/services/UserService"
import { ref } from "vue"

export const verifyAuth = () => {
  const isAuthenticated = ref(!!JwtService.getToken())

  const checkMe = () => {
    if(JwtService.getToken()) {
      ApiService.get('check').then(data => {
        UserService.saveUser(data.data)
      }).catch(error => {
        JwtService.destroyToken()
        console.error(error)
      })
    }
  }

  return {
    isAuthenticated,
    checkMe,
  }
}
