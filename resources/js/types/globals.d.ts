declare interface Links {
    [key: string]: string
}

namespace App {
    declare interface User {
        id: number
        name: string
    }

    declare interface IpAddress {
        id: number
        label: string
        ip_address: string
        links: {
            show_path: string
            edit_path: string
        }
    }

    type Change = {
        before: any
        after: any
    }

    declare interface Audit {
        id: number
        event: "created" | "updated"
        user: App.User
        changes: Change[]
    }
}
