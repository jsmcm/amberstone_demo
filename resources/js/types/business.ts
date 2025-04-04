export interface Business {
    id: number,
    type: "distributor" | "supplier",
    name: string,
    address: string,
    country: string,
    vat_number: string,
    created_at: string,
    updated_at: string,
}
