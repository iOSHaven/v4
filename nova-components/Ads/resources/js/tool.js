Nova.booting((Vue, router, store) => {
  router.addRoutes([
    {
      name: 'ads',
      path: '/ads',
      component: require('./components/Tool'),
    },
  ])
})
