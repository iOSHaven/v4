Nova.booting((Vue, router, store) => {
  router.addRoutes([
    {
      name: 'V4',
      path: '/V4',
      component: require('./components/Tool'),
    },
  ])
})
