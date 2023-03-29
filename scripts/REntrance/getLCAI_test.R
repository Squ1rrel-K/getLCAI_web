# This is the entrance of getLCAI_web

base_path = "./scripts/REntrance";
#base_path = "D:/Software/laragon/www/getLCAI_web/scripts/REntrance";
setwd(base_path)
.libPaths(base_path)



exp_test_path = "./test_data/exp_GSE165843.txt"
pheno_test_path = "./test_data/GSE165843_phe.txt"
control_type = "shAMPKa"
experimental_type = "shCTL"
data_type = "Array"
json_name = "resulta.json"

install.packages("./getLCAI_1.0.4.tar.gz",
                 repos = NULL,
                 type = "source")
library(getLCAI)

exp_test <- read.table(exp_test_path, header = TRUE)
pheno_test <- read.table(pheno_test_path, header = TRUE)

outlist = getlcai(
  exp = exp_test_path,
  pheno = pheno_test_path,
  control = control_type,
  experimental = experimental_type,
  type = data_type,
  jsonsave=json_name,
)

