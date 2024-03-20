import ApiService from "@/services/ApiService"
import JwtService from "@/services/JwtService"
import UserService from "@/services/UserService"
import { ref } from "vue"

export const verifyAuth = () => {
  const isAuthenticated = ref(!!JwtService.getToken())

  const checkMe = async () => {
    try {
      const res = await ApiService.get('check')
      
      UserService.saveUser(res.data)
    } catch (error) {
      JwtService.destroyToken()
      console.log(error)
    }
  }

  return {
    isAuthenticated,
    checkMe,
  }
}
