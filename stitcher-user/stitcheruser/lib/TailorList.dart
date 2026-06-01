import 'package:flutter/material.dart';
import 'package:stitcher/ApiConfig/ApiConfig.dart';
import 'package:stitcher/TailorDetail.dart';
import 'package:stitcher/model/Tailor.dart';

class TailorList extends StatefulWidget {
  const TailorList({Key? key}) : super(key: key);

  @override
  State<TailorList> createState() => _TailorListState();
}

class _TailorListState extends State<TailorList> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("Tailor List"),
        backgroundColor: Colors.purple[800],
      ),
      body: FutureBuilder(
        future: ApiConfig.getTailorList(),
        builder: (BuildContext context, AsyncSnapshot<dynamic> snapshot) {
          if (snapshot.hasData && !snapshot.hasError) {
            List list = snapshot.data as List;
            return ListView.builder(
                itemCount: list.length,
                itemBuilder: (context, index) {
                  return InkWell(
                    onTap: () async {
                      Tailor tailor = new Tailor(
                          list[index]['id'],
                          list[index]['name'],
                          list[index]['contact'],
                          list[index]['email'],
                          list[index]['city'],
                          list[index]['country'],
                          list[index]['lat'],
                          list[index]['lang'],
                          list[index]['image'],
                          list[index]['status']);

                      Navigator.push(
                          context,
                          MaterialPageRoute(
                              builder: (context) => TailorDetail(tailor)));
                    },
                    child: Container(
                        padding: EdgeInsets.all(15.0),
                        margin: EdgeInsets.all(5.0),
                        width: MediaQuery.of(context).size.width,
                        height: 160,
                        decoration: BoxDecoration(
                          color: Colors.purple[800],
                          borderRadius: BorderRadius.circular(5.0),
                        ),
                        child: Column(
                          mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                          children: [
                            Row(
                              mainAxisAlignment: MainAxisAlignment.spaceBetween,
                              children: [
                                ClipOval(
                                  child: Image.network(
                                    "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3luvcsWr-JRg2VVZc-CKWlISAqMP-C6_2HA&usqp=CAU",
                                    scale: 4.0,
                                  ),
                                ),
                                Text(
                                  list[index]['name'],
                                  style: TextStyle(
                                      color: Colors.white, fontSize: 17.0),
                                )
                              ],
                            ),
                            SizedBox(
                              height: 10.0,
                            ),
                            Row(
                              mainAxisAlignment: MainAxisAlignment.spaceBetween,
                              children: [
                                Text(
                                  "Contact : " + list[index]['contact'],
                                  style: TextStyle(
                                      color: Colors.white, fontSize: 14.0),
                                ),
                                Text(
                                  "City : " + list[index]['city'],
                                  style: TextStyle(
                                      color: Colors.white, fontSize: 14.0),
                                )
                              ],
                            )
                          ],
                        )),
                  );
                });
          } else {
            return Center(
              child: Text("No Tailor in the List"),
            );
          }
        },
      ),
    );
  }
}
