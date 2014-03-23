import lxml
from lxml import etree

username = 'ABaker'
password = 'SoSecret'

print("Login: ", end="")
username = input()
print("Password: ", end="")
password = input()

FindUserXPath = "//Employee[UserName/text()='" + username + "' and Password/text()='" + password + "']";
#FindUserXPath = "//Employee[UserName/text()='PPan' and Password/text()='']"
file = open("employees.xml")
tree = etree.parse(file)
result = tree.xpath(FindUserXPath)
if(len(result) > 0):
  print("Logged in as " + result[0][0].text)
else:
  print("Inavlid login or password")
file.close()
"""
doc = lxml.parseFile("employee.xml")
ctxt = doc.xpathNewContext()
res = ctxt.xpathEval(FindUserXPath)
print(len(res))
doc.freeDoc()
ctxt.xpathFreeContext()
"""
