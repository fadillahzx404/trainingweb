import "animate.css";
import "flowbite";
import { DataTable } from "simple-datatables";
import XLSX from "xlsx-js-style";
import "./bootstrap";

if (document.getElementById("tabless")) {
    const customData = {
        headings: ["Name", "Company", "Date"],
        data: [
            ["Flowbite", "Bergside", "05/23/2023"],
            ["Next.js", "Vercel", "03/12/2024"],
        ],
    };
    const table = new DataTable("#tabless", {
        template: (options, dom) =>
            "<div class='" +
            options.classes.top +
            "'>" +
            "<div class='flex flex-col sm:flex-row sm:items-center space-y-4 sm:space-y-0 sm:space-x-3 rtl:space-x-reverse w-full sm:w-auto'>" +
            (options.paging && options.perPageSelect
                ? "<div class='" +
                  options.classes.dropdown +
                  "'>" +
                  "<label>" +
                  "<select class='" +
                  options.classes.selector +
                  "'></select> " +
                  options.labels.perPage +
                  "</label>" +
                  "</div>"
                : "") +
            "<div >" +
            "<button id='export-excel' class='group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-white bg-green-400 hover:bg-green-300 hover:text-black hover:scale-90 transition-all duration-300  hover:font-bold dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white'>" +
            "<i class='fa-solid fa-file-excel pr-2'></i>" +
            "<span>Export Excel</span>" +
            "</button>" +
            "</div>" +
            "</div>" +
            (options.searchable
                ? "<div class='" +
                  options.classes.search +
                  "'>" +
                  "<input class='" +
                  options.classes.input +
                  "' placeholder='" +
                  options.labels.placeholder +
                  "' type='search' title='" +
                  options.labels.searchTitle +
                  "'" +
                  (dom.id ? " aria-controls='" + dom.id + "'" : "") +
                  ">" +
                  "</div>"
                : "") +
            "</div>" +
            "<div class='" +
            options.classes.container +
            "'" +
            (options.scrollY.length
                ? " style='height: " + options.scrollY + "; overflow-Y: auto;'"
                : "") +
            "></div>" +
            "<div class='" +
            options.classes.bottom +
            "'>" +
            (options.paging
                ? "<div class='" + options.classes.info + "'></div>"
                : "") +
            "<nav class='" +
            options.classes.pagination +
            "'></nav>" +
            "</div>",
        data: customData,
    });

    document.getElementById("export-excel").addEventListener("click", () => {
        const dataWithHeaders = [customData.headings, ...customData.data];
        const wb = XLSX.utils.book_new();
        const ws = XLSX.utils.aoa_to_sheet(dataWithHeaders);
        const range = XLSX.utils.decode_range(ws["!ref"]);
        for (let R = range.s.r; R <= range.e.r; ++R) {
            for (let C = range.s.c; C <= range.e.c; ++C) {
                const cell_address = { c: C, r: R };
                const cell_ref = XLSX.utils.encode_cell(cell_address);
                if (!ws[cell_ref]) ws[cell_ref] = { t: "s", v: "" };
                ws[cell_ref].s = {
                    font: R === 0 ? { bold: true } : {},
                    border: {
                        top: { style: "thin", color: { rgb: "000000" } },
                        bottom: { style: "thin", color: { rgb: "000000" } },
                        left: { style: "thin", color: { rgb: "000000" } },
                        right: { style: "thin", color: { rgb: "000000" } },
                    },
                };
            }
        }

        // Auto size columns
        const colWidths = dataWithHeaders[0].map((_, colIndex) => {
            return Math.max(
                ...dataWithHeaders.map((row) =>
                    row[colIndex] ? row[colIndex].toString().length : 0
                )
            );
        });
        ws["!cols"] = colWidths.map((width) => ({ wch: width }));

        XLSX.utils.book_append_sheet(wb, ws, "Sheet1");

        XLSX.writeFile(wb, "table_data.xlsx");
    });
}
