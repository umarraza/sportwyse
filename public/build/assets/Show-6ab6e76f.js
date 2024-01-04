import r from"./AppLayout-edc82c1f.js";import _ from"./EditButton-f3bc2e37.js";import m from"./BackToList-e279762d.js";import{o as s,c as h,w as l,a as t,b as c,g as o,t as n,e as d,h as g,F as b}from"./app-bd23ec5b.js";import"./Banner-79647a4a.js";import"./Sidebar-dcd8c7d5.js";import"./Header-665907ec.js";import"./DropdownLink-af5f954e.js";const p={class:"row"},f={class:"col-12"},k={class:"card m-b-30"},v={class:"card-header"},y=t("h4",{class:"pl-4"},"Event Details",-1),$={class:"card-header-right"},A={class:"card-body"},B={class:"table"},C=t("th",null,"Name",-1),P=t("th",null,"Price",-1),T=t("th",null,"Starting At:",-1),N=t("th",null,"Ending At",-1),U=t("th",null,"Payment Type",-1),w=t("th",null,"Processing Fee",-1),F=t("th",null,"Payments",-1),L=t("th",null,"Processing Fees (Using Credit Card):",-1),x=t("th",null,"Net Amount (Using Credit Card):",-1),E=t("th",null,"Total Price (Using Credit Card):",-1),S=t("th",null,"Processing Fees (Using Bank Account):",-1),V=t("th",null,"Net Amount (Using Bank Account):",-1),D=t("th",null,"Total Price (Using Bank Account):",-1),R=t("th",null,"Installment",-1),j={class:"row"},q={class:"col-md-12"},I={class:"card"},O=t("div",{class:"card-header"},[t("h4",{class:"pl-4"},"Teams")],-1),z={class:"card-body"},G={id:"teams-table",class:"table table-xs table-striped"},H=t("thead",null,[t("tr",null,[t("th",null,[t("strong",null,"Team Name")])])],-1),et={__name:"Show",props:{camp:{type:Object,required:!0}},setup(e){return(a,J)=>(s(),h(r,{title:"Camps"},{default:l(()=>[t("div",p,[t("div",f,[t("div",k,[t("div",v,[y,t("div",$,[c(m,{backToListRoute:a.route("club.camps.index"),class:"mr-1"},{default:l(()=>[o(" Back")]),_:1},8,["backToListRoute"]),c(_,{routeLink:a.route("club.camps.edit",e.camp.id)},{default:l(()=>[o(" Add")]),_:1},8,["routeLink"])])]),t("div",A,[t("table",B,[t("tr",null,[C,t("td",null,n(e.camp.name),1),P,t("td",null,"$"+n(e.camp.price),1)]),t("tr",null,[T,t("td",null,n(e.camp.start_date),1),N,t("td",null,n(e.camp.end_date),1)]),t("tr",null,[U,t("td",null,n(e.camp.payment_type),1),w,t("td",null,"$"+n(e.camp.processing_fee),1)]),t("tr",null,[F,t("td",null,n(e.camp.select_payment),1),L,t("td",null,"$"+n(e.camp.processing_fee_using_credit_card),1)]),t("tr",null,[x,t("td",null,"$"+n(e.camp.net_amount_using_credit_card),1),E,t("td",null,"$"+n(e.camp.total_price_using_credit_card),1)]),t("tr",null,[S,t("td",null,"$"+n(e.camp.processing_fee_using_bank_account),1),V,t("td",null,"$"+n(e.camp.net_amount_using_bank_account),1)]),t("tr",null,[D,t("td",null,"$"+n(e.camp.total_price_using_bank_account),1),R,t("td",null,n(e.camp.installment),1)])])])])])]),t("div",j,[t("div",q,[t("div",I,[O,t("div",z,[t("table",G,[H,t("tbody",null,[(s(!0),d(b,null,g(e.camp.teams,(i,u)=>(s(),d("tr",{key:u},[t("td",null,n(i.name),1)]))),128))])])])])])])]),_:1}))}};export{et as default};
