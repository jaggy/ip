declare interface Links {
    [key: string]: string
}

namespace App {
    declare interface IpAddress {
        id: number
        label: string
        ip_address: string
        links: {
            show_path: string
            edit_path: string
        }
    }
}
