export interface Business {
    id: number,
    type: "distributor" | "supplier",
    name: string,
    address: string,
    country: string,
    vat_number: string,
    sales_contact: SalesContact,
    logistics_contact: LogisticsContact,
    created_at: string,
    updated_at: string,
}

export interface SalesContact {
    id: number,
    name: string,
    email: string,
    telephone: string,
}


export interface LogisticsContact {
    id: number,
    name: string,
    email: string,
    telephone: string,
}