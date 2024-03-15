import JwtService from '@/services/JwtService'
import axios from 'axios'


const token = JwtService.getToken()
const auth = token ? 'Bearer ' + token : ''

const apiClient = axios.create({
  baseURL: import.meta.env.VITE_API_BASE_URL, // Ganti dengan URL API yang sesuai
  headers: {
    'Content-Type': 'application/json',
    'Authorization': auth,

    // Jika diperlukan, Anda bisa menambahkan header lain di sini
  },
})

export default {
  // Contoh method untuk mengambil data
  async get(url) {
    try {
      const response = await apiClient.get(url)
      
      return response.data
    } catch (error) {
      throw new Error(`Error fetching data: ${error}`)
    }
  },

  // Contoh method untuk mengirim data
  async post(url, data) {
    try {
      const response = await apiClient.post(url, data)
      
      return response.data
    } catch (error) {
      throw new Error(`Error sending data: ${error}`)
    }
  },

  // Contoh method untuk mengirim data
  async patch(url, data) {
    try {
      const response = await apiClient.patch(url, data)
      
      return response.data
    } catch (error) {
      throw new Error(`Error sending data: ${error}`)
    }
  },

  // Tambahkan method lain sesuai kebutuhan Anda
}
