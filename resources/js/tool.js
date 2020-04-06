Nova.booting((Vue, router, store) => {
    router.addRoutes([
        {
            name: 'nova-mail-manager',
            path: '/nova-mail-manager',
            component: require('./components/Tool'),
        },
    ])
})
