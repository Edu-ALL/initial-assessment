import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    { path: '/', redirect: '/login' },
    {
      path: '/',
      component: () => import('../layouts/default.vue'),
      children: [
        {
          path: 'dashboard',
          name: 'dashboard',
          component: () => import('../pages/user/student/dashboard.vue'),
        },
        {
          path: 'assessment',
          name: 'assessment',
          component: () => import('../pages/user/student/assessment.vue'),
        },
        {
          path: 'quest',
          name: 'quest',
          component: () => import('../pages/user/student/quest.vue'),
        },
      ],
    },
    {
      path: '/',
      component: () => import('../layouts/blank.vue'),
      children: [
        {
          path: 'login',
          props: route => ({
            ticket: route.query.ticket,
          }),
          component: () => import('../pages/user/student/auth/login.vue'),
        },
      ],
    },

    // Admin 
    { path: '/admin', redirect: '/admin/login' },
    {
      path: '/admin',
      component: () => import('../layouts/admin-default.vue'),
      children: [
        {
          path: 'dashboard',
          name: 'admin-dashboard',
          component: () => import('../pages/user/admin/dashboard.vue'),
        },
        {
          path: 'student',
          name: 'student',
          component: () => import('../pages/user/admin/student.vue'),
        },
        {
          path: 'student/:id',
          name: 'student-detail',
          props: route => ({
            id: route.params.id,
          }),
          component: () => import('../pages/user/admin/student-detail.vue'),
        },
      ],
    },
    {
      path: '/admin',
      component: () => import('../layouts/blank.vue'),
      children: [
        {
          path: 'login',
          component: () => import('../pages/user/admin/auth/login.vue'),
        },
      ],
    },

    // Catch-all route for 404 errors
    {
      path: '/:pathMatch(.*)*',
      name: 'NotFound',
      component: () => import('../pages/error/404.vue'),
    },
  ],
})

export default router
