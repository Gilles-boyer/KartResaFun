<template>
  <v-data-table :headers="headers" :items="slots" :items-per-page="17" class="elevation-0">
    <template v-slot:item.time="{ item }">
      <v-chip color="primary" dark class="font-weight-bold">
        {{ minToTime(item.time) }}
      </v-chip>
    </template>

    <template v-slot:item.nbre_pers="{ item }">
      <v-chip :color="changeColorNbrPers(countPeople(item.data))" dark class="font-weight-bold">
        {{ countPeople(item.data) }}
      </v-chip>
    </template>

    <template v-slot:item.children="{ item }">
      <v-badge v-if="getChildren(item.data)" bordered color="success" :content="countChildren(item.data)" overlap>
        <v-icon large color="orange">
          {{ getChildren(item.data) }}
        </v-icon>
      </v-badge>
    </template>

    <template v-slot:item.alert="{ item }">
      <v-row v-for="slot in item.data" :key="slot.slot_id">
        <v-col v-for="alert in slot.alerts" :key="alert.id">

          <v-tooltip bottom :color="alert.color">
            <template v-slot:activator="{ on, attrs }">
              <v-icon :color="alert.color" v-bind="attrs" v-on="on">
                {{ alert.icon }}
              </v-icon>
            </template>
            <span> {{ alert.name }} </span>
          </v-tooltip>

        </v-col>
      </v-row>

    </template>

    <template v-slot:item.biplace="{ item }">
      <v-chip dark :color="changeColorBiPlace(countBiPlace(item.data))" class="font-weight-bold">
        {{ countBiPlace(item.data) }}
      </v-chip>
    </template>

    <template v-slot:item.reservations="{ item }">
      <v-row align="center" class="pt-3 pb-3">
        <v-col v-for="(reservation, index) in item.data" :key="index" cols="12" class="pb-1 py-1">
          <v-tooltip bottom :color="getColorReservation(reservation).color">
            <template v-slot:activator="{ on, attrs }">
              <v-btn rounded :color="getColorReservation(reservation).color" small v-bind="attrs" v-on="on" block dark
                class="font-weight-bold">
                <v-row>
                  <v-col col="12" sm="12" md="2" xl="2" class="col-12">
                    Résa n° {{ reservation.reservation.id }}
                  </v-col>
                  <v-col col="12" sm="12" md="6" xl="6" class="col-12">
                    {{ reservation.client.name }}
                  </v-col>
                  <v-col col="12" sm="12" md="4" xl="4" class="col-12">
                    {{ reservation.client.phone }}
                  </v-col>
                </v-row>
              </v-btn>
            </template>
            <span>{{ getColorReservation(reservation).message }}</span>
          </v-tooltip>
        </v-col>
      </v-row>
    </template>
  </v-data-table>
</template>

<script>
import apiSlot from "../services/slot";
import service from "../services/utilitaire";
export default {
  mounted() {
    this.init();
    //console.log(service.toHoursAndMinutes(75));
    //this.createSlot();
  },
  data() {
    return {
      headers: [
        {
          text: "Heure",
          align: "start",
          sortable: false,
          value: "time",
        },
        { text: "Nbre places", value: "nbre_pers" },
        { text: "Enfant", value: "children" },
        { text: "Alert", value: "alert" },
        { text: "Nbre bi-place", value: "biplace" },
        { text: "Réservation", value: "reservations" },
      ],
      slots: [],
    };
  },
  methods: {
    async init() {
      apiSlot
        .getSlotsByDate("2023-10-09")
        .then((res) => {
          this.createSlot();
          this.slots.forEach((slot, index) => {
            res.data.data.forEach((element) => {
              if (
                element.start_time.slice(0, 5) ==
                service.toHoursAndMinutes(slot.time)
              ) {
                this.slots[index].data.push(element);
              }
            });
          });
          console.log(this.slots);
        })
        .catch((err) => console.log(err));
    },

    createSlot() {
      var start = service.data.beginMin;
      var stop = service.data.stopMin;
      while (start <= stop) {
        this.slots.push({
          time: start,
          data: [],
        });
        start += service.data.durationSlotKart;
      }
    },

    minToTime(min) {
      return service.toHoursAndMinutes(min);
    },

    countPeople(listResa) {
      var nbre_pers = 0;
      if (listResa.length != 0) {
        listResa.forEach((element) => {
          nbre_pers += element.nbre_pers;
        });
      }
      return nbre_pers;
    },

    countBiPlace(listResa) {
      var nbre_pers = 0;
      if (listResa.length != 0) {
        listResa.forEach((element) => {
          nbre_pers += element.reservation.number_of_biplace;
        });
      }
      return nbre_pers;
    },

    changeColorNbrPers(nbr) {
      if (nbr == 0) {
        return "second";
      } else if (nbr <= 7) {
        return "success";
      } else if (nbr <= 9) {
        return "orange";
      } else {
        return "error";
      }
    },

    changeColorBiPlace(nbr) {
      if (nbr == 0) {
        return "second";
      } else if (nbr <= 2) {
        return "success";
      } else {
        return "error";
      }
    },

    getChildren(listResa) {
      var icon = "";
      listResa.forEach((element) => {
        if (element.reservation.number_of_children > 0) {
          icon = "mdi-account-alert";
        }
      });
      return icon;
    },

    countChildren(listResa) {
      var counter = 0;
      listResa.forEach((element) => {
        if (element.reservation.number_of_children > 0) {
          counter += element.reservation.number_of_children;
        }
      });
      return counter;
    },

    sumPeoples(resa_id, reservationFormula_id, totalresa) {
      var nbrPers = 0;
      if (resa_id) {
        this.slots.forEach((slot) => {
          if (slot.data.length > 0) {
            slot.data.forEach((resa) => {
              if (resa_id == resa.reservation.id) {
                if (reservationFormula_id != resa.reservationFormula_id) {
                  nbrPers =
                    resa.reservation.number_of_adults +
                    resa.reservation.number_of_children;
                }
              }
            });
          }
        });
      }
      return nbrPers + totalresa;
    },

    getColorReservation(resa) {
      if (
        resa.nbre_pers !=
        this.sumPeoples(
          resa.reservation.id,
          resa.reservationFormula_id,
          resa.reservation.number_of_adults +
          resa.reservation.number_of_children
        )
      ) {
        return {
          color: "error",
          message: "merci de vérifier le nombre de personne"
        };
      } else if (resa.formula.number_of_sessions != resa.nb_slot_booking) {
        return {
          color: "error",
          message: "merci de vérifier le nombre de session réservée"
        };
      } else if (resa.nb_payments > 0) {
        return {
          color: "success",
          message: resa.formula.name
        };
      }
      return {
        color: "secondary",
        message: resa.formula.name
      };
    },
  },
};
</script>
